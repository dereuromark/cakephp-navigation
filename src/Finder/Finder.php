<?php

namespace Navigation\Finder;

use Cake\Core\App;
use Cake\Filesystem\Folder;
use Navigation\Dto\ControllerDto;
use Navigation\Dto\ItemDto;

class Finder {

	/**
	 * @param array $args
	 *
	 * @return \Navigation\Dto\ItemDto[][]
	 */
	public function items(array $args): array {
		$plugins = $this->plugins($args['plugin'] ?? '');
		$prefixes = $this->prefixes($args['prefix'] ?? '');

		$controllers = $this->appControllers($plugins, $prefixes);
		$pluginControllers = $this->pluginControllers($plugins, $prefixes);
		$controllers = array_merge($controllers, $pluginControllers);

		return $this->createItems($controllers);
	}

	/**
	 * @param string $pluginString
	 *
	 * @return array
	 */
	protected function plugins(string $pluginString): array {
		$pieces = explode(',', $pluginString);

		return $pieces;
	}

	/**
	 * @param string $prefixString
	 *
	 * @return array
	 */
	protected function prefixes(string $prefixString): array {
		$pieces = explode(',', $prefixString);

		return $pieces;
	}

	/**
	 * @param string[] $plugins
	 * @param string[] $prefixes
	 *
	 * @return ControllerDto[]
	 */
	protected function appControllers(array $plugins, array $prefixes): array {
		if ($plugins && !in_array('app', $plugins, true)) {
			return [];
		}

		$paths = App::path('Controller');
		$appControllers = $this->getControllers($paths);

		//TODO: prefixes
		$controllers = $appControllers['root'] ?? [];

		return $controllers;
	}

	/**
	 * @param string[] $plugins
	 * @param string[] $prefixes
	 *
	 * @return ControllerDto[]
	 */
	protected function pluginControllers(array $plugins, array $prefixes): array {
		$controllers = [];
		foreach ($plugins as $plugin) {
			if ($plugin === 'app') {
				continue;
			}

			$paths = App::path('Controller', $plugin);
			$pluginControllers = $this->getControllers($paths, $plugin);

			//TODO: prefixes
			$rootControllers = $pluginControllers['root'] ?? [];

			$controllers = array_merge($controllers, $rootControllers);
		}

		return $controllers;
	}

	/**
	 * @param string[] $folders
	 *
	 * @return \Navigation\Dto\ControllerDto[][]
	 */
	protected function getControllers(array $folders, ?string $plugin = null): array {
		$names = [];
		foreach ($folders as $folder) {
			$folderContent = (new Folder($folder))->read(Folder::SORT_NAME, true);

			foreach ($folderContent[1] as $file) {
				$fileName = pathinfo($file, PATHINFO_FILENAME);
				if (!preg_match('#(.+)Controller$#', $fileName, $matches)) {
					continue;
				}

				$name = $matches[1];

				$templatePaths = $this->templatePaths($name, $plugin);

				$controller = new ControllerDto();
				$controller->setName($name)
					->setPath($folder . $file)
					->setTemplatePaths($templatePaths)
					->setPlugin($plugin);

				$names['root'][$name] = $controller;
			}

			foreach ($folderContent[0] as $subFolder) {
				$folderContent = (new Folder($folder . $subFolder))->read(Folder::SORT_NAME, true);

				foreach ($folderContent[1] as $file) {
					$fileName = pathinfo($file, PATHINFO_FILENAME);
					if (!preg_match('#(.+)Controller$#', $fileName, $matches)) {
						continue;
					}

					$name = $matches[1];

					$templatePaths = $this->templatePaths($name, $plugin);

					$controller = new ControllerDto();
					$controller->setName($name)
						->setPath($folder . $file)
						->setTemplatePaths($templatePaths)
						->setPrefix($subFolder)
						->setPlugin($plugin);

					$names[$subFolder][$name] = $controller;
				}
			}
		}

		return $names;
	}

	/**
	 * @param \Navigation\Dto\ControllerDto[] $controllers
	 *
	 * @return \Navigation\Dto\ItemDto[][]
	 */
	protected function createItems(array $controllers): array {
		$actionParser = new ActionParser();

		$items = [];
		foreach ($controllers as $controller) {
			$actions = $actionParser->parse($controller->getPath(), $controller->getTemplatePaths());
			foreach ($actions as $action) {
				$item = new ItemDto();
				$item->setController($controller);
				$item->setName($action);

				$items[$controller->getPath()][] = $item;
			}
		}

		return $items;
	}

	/**
	 * @param string $name
	 * @param string|null $plugin
	 * @param string|null $prefix
	 *
	 * @return string[]
	 */
	protected function templatePaths(string $name, ?string $plugin, ?string $prefix = null): array {
		$templatePaths = App::path('Template', $plugin);

		$paths = [];
		foreach ($templatePaths as $templatePath) {
			if ($prefix) {
				$templatePath .= $prefix . DS;
			}

			$templatePath .= $name . DS;

			$paths[] = $templatePath;
		}

		return $paths;
	}

}
