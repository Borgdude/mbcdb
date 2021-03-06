<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Search;

class SearchController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function searchStub() {
		$results = null;
    return view('counselors.results', compact('results'));
  }

	public function noResults()
	{
		$results = null;
		return view('counselors.results', compact('results'));
	}

	public function search(Request $request)
	{

		if ($request['search'] == '') {
			return redirect()->back();
		}

		switch ($request['class']) {

			case 'App\District':
				$districts = \App\District::where('name', 'LIKE', $request['search'])->paginate(25);
				$results = new \Illuminate\Database\Eloquent\Collection;
				foreach ($districts as $district) {
					$results->add($district->counselors);
				}
				return view('counselors.results', compact('results'));
				break;

			case 'App\Counselor':
				$results = \App\Search::byClass('App\Counselor', $request['search'], \App\Counselor::getFields());
				return view('counselors.results', compact('results'));
				break;

			case 'App\Council':
				$councils = \App\Council::where('name', 'LIKE', $request['search'])->paginate(25);
				$results = new \Illuminate\Database\Eloquent\Collection;
				foreach ($councils as $council) {
					$districts = $council->districts;
					foreach ($districts as $district) {
						$results->add($district->counselors);
					}
				}
				return view('counselors.results', compact('results'));
				break;

			case 'unit_num':
				$search_results = \App\Counselor::where('unit_num', $request['search'])->paginate(25);
				// Super ghetto.  This adds another 'dimension' to the collection.
				$results = new \Illuminate\Database\Eloquent\Collection;
				$results->add($search_results);
				return view('counselors.results', compact('results'));
				break;

			case 'App\User':
				$results = \App\Search::byClass('App\User', $request['search'], ['name', 'email']);
				return view('users.results', compact('results'));
				break;

			default:
				$badges = \App\Badge::where('name', 'LIKE', $request['search'])->paginate(25);
				$results = new \Illuminate\Database\Eloquent\Collection;
				foreach ($badges as $badge) {
					$results->add($badge->counselors);
				}
				return view('counselors.results', compact('results'));
				break;
		}
	}
}
