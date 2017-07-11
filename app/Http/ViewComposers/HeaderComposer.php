<?
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
Use App\Notification;

class HeaderComposer {


/**
* Bind data to the view.
*
* @param  View $view
* @return void
*/
public function compose(View $view)
{
    if (Auth::check()) {
        $notifcountunreadable = Notification::where('user_id', Auth::user()->id)->where('read', '1')->count();
        $notification = Notification::where('user_id', Auth::user()->id)->get();
        $view->with('notif', $notification);
        $view->with('notifcount', $notifcountunreadable);
    }
}


}