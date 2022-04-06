<?php 
ob_start();
session_start();
include '../connection.php';
if(!isset($_SESSION['passenger'])){header("Location: login.php"); die();}
$passenger = $_SESSION['passenger'];
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$generate = "<html><body>
             <style>
			 table{width: 100%; margin-top: 40px; border: 1px solid #27408B; background: #ffffff; border-collapse: collapse;}
             table th{border: 1px solid #54FF9F; padding: 10px; text-align: left; background: #27408B; color: #54FF9F;}				
             table td{border: 1px solid #27408B; padding: 10px;}
             </style>";

$generate .= "<table>
			<tr>
				<th>Trip</th>
				<th>Train</th>
				<th>Ticket fare</th>
				<th>Status</th>
			</tr>";	
			
	$bsql = mysqli_query($con, "SELECT * FROM `bookings` WHERE `passenger`=".$passenger['id']."  ORDER BY `id` DESC");
	if(mysqli_num_rows($bsql) > 0){
	while($brow = mysqli_fetch_assoc($bsql)){
	$sql = mysqli_query($con, "SELECT * FROM `trips` WHERE `id`=".$brow['trip']."");
	$row = mysqli_fetch_assoc($sql);
	
	$sql2 = mysqli_query($con, "SELECT * FROM `trains` WHERE id=".$row['train']."");
	$row2 = mysqli_fetch_assoc($sql2);
	$sql4 = mysqli_query($con, "SELECT * FROM `routes` WHERE id=".$row['route']."");
	$row4 = mysqli_fetch_assoc($sql4);
	
    if($brow['status'] == 0){
	$status = '<b>Awaiting confirmation</b>';
	}elseif($brow['status'] == 1){
	$status = '<b>Ticket confirmed</b><br><br>';
	if($row['ttype'] == 'Tourism trip'){
		$status .= "Tourism ticket not yet collected from the front desk officers";
	 }else{$status .= 'Seat reservation completed';}
	}elseif($brow['status'] == 2){
	$status = '<b>Ticket confirmed</b><br><br>Tourism ticket received from desk officer. Seat reservation completed';

	}elseif($brow['status'] == 3){
	$status = '<b>Cancellation request sent</b>';
	}elseif($brow['status'] == 4){
	$status = '<b>Ticket cancelled</b>';
	}	
			
			
			
			$generate .= "<tr>
							<td>
								<b>Trip type:</b> ".$row['ttype']."<br><br>
								<b>Arrival:</b> ".$row4['arrival']."<br><br>
								<b>Departure:</b> ".$row4['departure']."<br><br>
								<b>Date:</b> ".$row['date']."<br><br>
								<b>Time:</b> ".$row4['tfrom']." - ".$row4['tto']."
							</td>
							<td>
							  	<b>Train number:</b> ".$row2['number']."<br><br>
								<b>Total seats:</b> ".$row2['seats']."
                             </td>
							 <td>
								".number_format($row4['tfare'], 2)."<br><br>
								<b>Your seat No:</b> ".$brow['seat']."<br><br>
								<b>Booking time:</b> ".$brow['time']."
                             </td>
							 <td>".$status."</td>
						</tr>";
			}}


$generate .= "</table>
              </body></html>";
			  
$dompdf = new Dompdf();
$dompdf->loadHtml($generate);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
ob_end_clean();
$dompdf->stream("PrintOrders", array("Attachment"=>0));
			  