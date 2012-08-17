<?php

abstract class ViewModel extends Fuel\Core\ViewModel
{
	/**
	 * テンプレートのもとになるクラス名が異なる場合、ここで指定する
	 * trueを指定するとコントローラ、アクションからviewを導き出す
	 *
	 * @var mixed
	 */
	protected $alt_view = null;

	/**
	 * テンプレートエンジンはsmartyを使うので、View_Smartyを利用
	 */
	protected function set_view()
	{
		if ($this->alt_view === true) {
			$ctrl = preg_replace('/^Controller_/', '', Request::active()->controller);
			$this->alt_view = strtolower($ctrl).'\\'.Request::active()->action;
		}
		$auto_encode = \Config::get('parser.View_Smarty.auto_encode', null);
		$this->_view = \View_Smarty::forge($this->alt_view?:$this->_view, null, $auto_encode);
	}

	/**
	 * レンダリング処理を実装しているメソッドにコントローラの引数を渡して、
	 * コントローラのアクションメソッドと同様に引数を扱うためにオーバーライド
	 *
	 * @param string
	 * @return string
	 */
	public function render()
	{
		if (class_exists('Request', false))
		{
			$current_request = Request::active();
			Request::active($this->_active_request);
		}

		if (count($this->request()->method_params))
		{
			call_user_func_array(array($this, $this->_method), $this->request()->method_params);
		}
		elseif (count($this->request()->named_params))
		{
			call_user_func_array(array($this, $this->_method), array_values((array)$this->request()->named_params));
		}
		else
		{
			$this->{$this->_method}();
		}

		$this->after();

		$return = $this->_view->render();

		if (class_exists('Request', false))
		{
			Request::active($current_request);
		}

		return $return;
	}
}

