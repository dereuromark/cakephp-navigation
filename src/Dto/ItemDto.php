<?php declare(strict_types = 1);

namespace Navigation\Dto;

use Navigation\Dto\ControllerDto;

class ItemDto {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var \Navigation\Dto\ControllerDto
	 */
	protected $controller;

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
	 * @param \Navigation\Dto\ControllerDto $controller
	 *
	 * @return $this
	 */
	public function setController(ControllerDto $controller) {
		$this->controller = $controller;

		return $this;
	}

	/**
	 * @return \Navigation\Dto\ControllerDto
	 */
	public function getController(): ControllerDto {
		return $this->controller;
	}

	/**
	 * @return bool
	 */
	public function hasController(): bool {
		return $this->controller !== null;
	}

}
