<?php

namespace Navigation\Finder;

use App\Controller\AppController;
use Cake\Utility\Inflector;
use ReflectionClass;
use ReflectionMethod;

class ActionParser {

	/**
	 * @var string[]|null
	 */
	protected static $appControllerActions;

	/**
	 * @param string $path
	 * @param string[] $templatePaths
	 *
	 * @return string[]
	 */
	public function parse(string $path, array $templatePaths = []): array {
		$actions = $this->parseFile($path);

		if (static::$appControllerActions === null) {
			try {
				$class = new ReflectionClass(AppController::class);
				$methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
			} catch (\Throwable $exception) {
				return [];
			}

			static::$appControllerActions = [];
			foreach ($methods as $method) {
				static::$appControllerActions[] = $method->getName();
			}
		}

		$actions = array_diff($actions, static::$appControllerActions);

		$result = [];
		foreach ($actions as $action) {
			if ($templatePaths && !$this->hasTemplate($action, $templatePaths)) {
				continue;
			}

			$result[] = $action;
		}

		$indexPos = array_search('index', $result, true);

		if ($result && $indexPos !== false && $indexPos !== 0) {
			unset($result[$indexPos]);
			array_unshift($result, 'index');
		}

		return array_values($result);
	}

	/**
	 * @param string $path
	 *
	 * @return string[]
	 */
	protected function parseFile($path): array {
		$content = file_get_contents($path);

		preg_match_all('/public function (.+)\(/', $content, $matches);
		if (empty($matches[1])) {
			return [];
		}

		return $matches[1];
	}

	/**
	 * @param string $action
	 * @param string[] $templatePaths
	 *
	 * @return bool
	 */
	protected function hasTemplate(string $action, array $templatePaths): bool {
		$template = Inflector::underscore($action) . '.ctp';

		foreach ($templatePaths as $templatePath) {
			if (file_exists($templatePath . $template)) {
				return true;
			}
		}

		return false;
	}

}
