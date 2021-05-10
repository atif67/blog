<?php


namespace App\Traits\Admin;


use Illuminate\Support\Facades\Auth;

trait ResponseView
{
    /*
     *
     * @param string            $viewName
     * @param array|object      $data
     *
     */
    public function coreResponse($viewName,$data = null)
    {
        return view($viewName)->with(['data' => $data]);
    }

    /*
     *
     * @param string            $viewName
     * @param array|object      $data
     *
     */
    public function success($viewName, $data = null)
    {
        session()->flash('status', 'true');
        return $this->coreResponse($viewName,$data);
    }

    /*
     *
     * @param string            $viewName
     * @param array|object      $data
     *
     */
    public function view($viewName)
    {
        return $this->coreResponse($viewName);
    }

    /*
     *
     * @param string            $viewName
     *
     */
    public function error($viewName)
    {
        session()->flash('status', 'false');
        return $this->coreResponse($viewName);
    }

    public function isAdmin()
    {
        if (Auth::user()->role_id != 1)
        {
            return abort(404);
        }
    }

    public function isEditor()
    {
        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
        {

        }else{
            return abort(404);
        }
    }
}
