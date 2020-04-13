<?php declare(strict_types = 1);

namespace Navigation\Dto;

use RuntimeException;

class ControllerDto {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string|null
	 */
	protected $prefix;

	/**
	 * @var string|null
	 */
	protected $plugin;

	/**
	 * @var string
	 */
	protected $path;

	/**
	 * @var string[]
	 */
	protected $templatePaths = [];

	/**
	 * @var array|null
	 */
	protected $actions;

	/**
	 * @param string $name
	 *
	 * @return $this
	 */
	public function setName(string $name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @return bool
	 */
	public function hasName(): bool {
		return $this->name !== null;
	}

	/**
	 * @param string|null $prefix
	 *
	 * @return $this
	 */
	public function setPrefix(?string $prefix) {
		$this->prefix = $prefix;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPrefix(): ?string {
		return $this->prefix;
	}

	/**
	 * @throws \RuntimeException If value is not set.
	 *
	 * @return string
	 */
	public function getPrefixOrFail(): string {
		if (!isset($this->prefix)) {
			throw new RuntimeException('Value not set for field `prefix` (expected to be not null)');
		}

		return $this->prefix;
	}

	/**
	 * @return bool
	 */
	public function hasPrefix(): bool {
		return $this->prefix !== null;
	}

	/**
	 * @param string|null $plugin
	 *
	 * @return $this
	 */
	public function setPlugin(?string $plugin) {
		$this->plugin = $plugin;

		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getPlugin(): ?string {
		return $this->plugin;
	}

	/**
	 * @throws \RuntimeException If value is not set.
	 *
	 * @return string
	 */
	public function getPluginOrFail(): string {
		if (!isset($this->plugin)) {
			throw new RuntimeException('Value not set for field `plugin` (expected to be not null)');
		}

		return $this->plugin;
	}

	/**
	 * @return bool
	 */
	public function hasPlugin(): bool {
		return $this->plugin !== null;
	}

	/**
	 * @param string $path
	 *
	 * @return $this
	 */
	public function setPath(string $path) {
		$this->path = $path;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPath(): string {
		return $this->path;
	}

	/**
	 * @return bool
	 */
	public function hasPath(): bool {
		return $this->path !== null;
	}

	/**
	 * @param string[] $paths
	 *
	 * @return $this
	 */
	public function setTemplatePaths(array $paths) {
		$this->templatePaths = $paths;

		return $this;
	}

	/**
	 * @return string[]
	 */
	public function getTemplatePaths(): array {
		return $this->templatePaths;
	}

	/**
	 * @param array|null $actions
	 *
	 * @return $this
	 */
	public function setActions(?array $actions) {
		$this->actions = $actions;

		return $this;
	}

	/**
	 * @return array|null
	 */
	public function getActions(): ?array {
		return $this->actions;
	}

	/**
	 * @throws \RuntimeException If value is not set.
	 *
	 * @return array
	 */
	public function getActionsOrFail(): array {
		if (!isset($this->actions)) {
			throw new RuntimeException('Value not set for field `actions` (expected to be not null)');
		}

		return $this->actions;
	}

	/**
	 * @return bool
	 */
	public function hasActions(): bool {
		return $this->actions !== null;
	}

}
