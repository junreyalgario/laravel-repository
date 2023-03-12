<?php

namespace Repository\Core;

abstract class BaseService implements BaseInterface
{
	/**
	 * Paginate resource
	 */
	public function paginate($item_per_page = null, $filters = null)
	{
		//
	}

	/**
	 * List of all resource
	 */
	public function list($filters = null)
	{
		//
	}

	/**
	 * Create new resource
	 */
	public function store($data)
	{
		//
	}

	/**
	 * Update resource
	 */
	public function update($data)
	{
		//
	}

	/**
	 * Show resource
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Delete resource
	 */
	public function delete($id)
	{
		//
	}
}