<?
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
Use App\Notification;

class HeaderComposer 
{


/**
* Bind data to the view.
*
* @param  View $view
* @return void
*/
public function compose (View $view)
{
	if (Auth::check()) {
		$id = Auth::user()->id;
		$notifcountunreadable = Notification::where('user_id', $id)->where('read', '1')->count();
		$notification = Notification::where('user_id', $id)->orderBy('created_at', 'desc')->get();
		$view->with('notif', $notification);
		$view->with('notifcount', $notifcountunreadable);

	}
}


}