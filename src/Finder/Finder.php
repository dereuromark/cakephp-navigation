<?php

namespace Navigation\Finder;

use Cake\Core\App;
use Cake\Filesystem\Folder;

class Finder {

	/**
	 * @param array $args
	 *
	 * @return array
	 */
	public function items(array $args): array {
		$plugins = $this->plugins($args['plugin'] ?? '');
		$prefixes = $this->prefixes($args['prefix'] ?? '');

		$items = $this->appItems($plugins, $prefixes);

		return [];
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

	protected function appItems(array $plugins, array $prefixes): array {
		if ($plugins && !in_array('app', $plugins, true)) {
			return [];
		}

		$paths = App::path('Controller');
		$files = $this->getFiles($paths);

		dd($files);
	}

	/**
	 * @param string[] $folders
	 *
	 * @return string[]
	 */
	protected function getFiles(array $folders): array {
		$names = [];
		foreach ($folders as $folder) {
			$folderContent = (new Folder($folder))->read(Folder::SORT_NAME, true);

			foreach ($folderContent[1] as $file) {
				$name = pathinfo($file, PATHINFO_FILENAME);
				$names[] = $name;
			}

			foreach ($folderContent[0] as $subFolder) {
				$folderContent = (new Folder($folder . $subFolder))->read(Folder::SORT_NAME, true);

				foreach ($folderContent[1] as $file) {
					$name = pathinfo($file, PATHINFO_FILENAME);
					$names[] = $subFolder . '/' . $name;
				}
			}
		}

		return $names;
	}

}
