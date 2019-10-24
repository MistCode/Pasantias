<?php  
$notif1 = DB::table('sends')
          ->where('recipient_id', Auth::user()->id)
          ->count();
echo $notif1;
?>