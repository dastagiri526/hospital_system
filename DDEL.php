<?php require('connection.php');?>
<html>
 <head>
  <title>Delete Doctors</title>
 <link rel="stylesheet" href="css/bootstrap.css"/>
 </head> 
 <body>
<table class="table table-bordered">
<tr bgcolor=blue><td align=center><font SIZE=6 color=white>HOSPITAL
MANAGEMENT SYSTEM</font></td></tr>
<tr><td><table align=center width=750 cellspacing=0 cellpadding=5>
<tr><td align=center><a href=dlist.php>Doctors</td><td align=center><a
href=plist.php>Patients</td><td align=center><a
href=alist.php>Appointments</td>
</table></td></tr>
<tr bgcolor=red><td ><font size=4 color=white>Doctors
List</font></td></tr>
<tr><td><a href=dadd.php>Add New Record</a></td></tr>
<tr><td><table width=750 cellspacing=0 cellpadding=5>
<tr bgcolor=#ccccc><td align=center>S No</td><td align=center>Doctor
Name</td><td align=center>Specialization</td><td
align=center>Options</td></tr>
<?php

error_reporting(1);
$todel=$_GET['rno'];
mysqli_query($conn,"update doct SET dshow='N' where dno='$todel' ;");
$rs1=mysqli_query($conn,"SELECT * from doct where dshow='Y' order by
dname;");
$sno=1;
while( $row=mysqli_fetch_array($rs1)) {
 echo "<tr><td>$sno</td><td>$row[1]</td><td>$row[2]</td><td><a
href=dmod.php?rno=".$row[0].">Modify</a> | <a
href=ddel.php?rno=".$row[0].">Delete</a></td></tr>";
 $sno++;
}
if ($sno==1) echo "<tr><td align=center><font size=4 color=red>Records
Not Found</font></td></tr>";
?>
</table></td></tr>
<tr><td align=center><hr></td></tr>
<tr bgcolor=red><td><font size=4 color=white>Deleted
Records</font></td></tr>
<tr><td><table width=750 cellspacing=0 cellpadding=5>
<tr bgcolor=#ccccc><td align=center>S No</td><td align=center>Doctor
Name</td><td align=center>Specialization</td><td
align=center>Options</td></tr>
<?php
$rs2=mysqli_query($conn,"SELECT * from doct where dshow='N' order by
dname;");
$sno=1;
while( $row=mysqli_fetch_array($rs2)) {
 echo "<tr><td>$sno</td><td>$row[1]</td><td>$row[2]</td><td><a
href=dundel.php?rno=".$row[0].">Undelete</a></td></tr>";
 $sno++;
}
if ($sno==1) echo "<tr><td align=center><font size=4 color=red>Records
Not Found</font></td></tr>";
?>
</table></td></tr> 
</table>
</body>
</html> 