<?php

namespace Repository\Core;

interface BaseInterface
{
	/**
	 * Paginate resource
	 */
	public function paginate($item_per_page = null, $filters = null);

	/**
	 * List of all resource
	 */
	public function list($filters = null);

	/**
	 * Create new resource
	 */
	public function store($payload);

	/**
	 * Update resource
	 */
	public function update($payload);
	
	/**
	 * Show resource
	 */
	public function show($id);

	/**
	 * Delete resource
	 */
	public function delete($id);
}