<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Http\Response;
use Cake\Http\ServerRequest;

class DemoCaseController extends AppController {

	/**
	 * @param \Cake\Http\ServerRequest|null $request
	 * @param \Cake\Http\Response|null $response
	 * @param string|null $name
	 * @param \Cake\Event\EventManager|null $eventManager The event manager. Defaults to a new instance.
	 * @param \Cake\Controller\ComponentRegistry|null $components The component registry. Defaults to a new instance.
	 */
	public function __construct(ServerRequest $request = null, Response $response = null, $name = null, $eventManager = null, $components = null) {
		parent::__construct($request, $response, $name, $eventManager, $components);
	}

	/**
	 * @param \Cake\Event\Event $event
	 * @return \Cake\Http\Response|null|void
	 */
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
	}

	/**
	 * @return void
	 */
	public function run() {
	}

	/**
	 * @return void
	 * @throws \RuntimeException
	 */
	public function coverage() {
	}

	/**
	 * @return \Cake\Http\Response|null|void
	 */
	public function startupProcess() {
	}

}
