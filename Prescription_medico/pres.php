<?php include"../Include/headerMedico.php";?>
<?php include"../Include/sidebarMedico.php";?>
<link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php
include("../inc/connect.php") ;

$query=mysqli_query($connection,"SELECT * FROM addnewpres")or die (mysqli_error($connection));
$numrows=mysqli_num_rows($query)or die (mysqli_error($connection));
$row1=mysql_fetch_all($query);
function mysql_fetch_all($query) {
$all = array();
while ($all[] = mysqli_fetch_assoc($query)) {$temp=$all;}
return $temp;
}
//print_r($row1); exit;
//$row1[]=mysql_fetch_assoc($query)or die (mysql_error());
?>

<div class="content-wrapper">
<section class="content-header">
<h1>
Receita
<small></small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Casa</a></li>
<li class="active">Receita</li>
</ol>
</section>
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-user"></i> <h3 class="box-title"> Receita</h3>
</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="./addnew.php"><button type="submit"   name="submit" class="btn btn-success bg-blue"><i class="fa fa-plus-square"></i> Adicionar Novo</button></a><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="record" name="patient" id="exampleInputPassword1" placeholder="">
<option value="" disabled selected="selected"> Todos   </option>
<option value=""></option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label >páginas gravadas</label>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--    <td>
<button type="button" class="btn btn-default">Copy</button>
</td> -->
<td>
<a href="./ExcelPrescription.php"><button type="button" class="btn btn-default">Exel</button></a>
</td>
<td>
<a href="./csvprescription.php"><button type="button" class="btn btn-default">CSV</button></a>
</td>
<!-- <td>
<button type="button" class="btn btn-default">PDF</button>
</td> -->
<td>
	<button type="button" onclick="window.print();" class="btn btn-default">Print</button>
</td>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Data</th>
<th>Paciente</th>
<th>Opção</th>

</tr>
</thead>
<tbody>
<?php
foreach ($row1 as $row)
{
  $s1=" SELECT name FROM patientregister WHERE id='".$row['patient']."'";
  $w1 =mysqli_query($connection,$s1) or die(mysqli_error($connection));
  //print_r($s1); exit;
    $row1=mysqli_fetch_array($w1)or die (mysqli_error($connection));
//print_r($row1); exit;
 //echo $row1; exit();

?> <tr>
<td><?php echo $row['date'];?></td>
<td><?php echo $row1['name'];?></td>  
<td>
<a href="viewprescription.php?id=<?php echo $row['id'];?>"><span class="btn btn-success "><i class="fa fa-eye"></i>View Prescription</span></a>
<a href="editprescription.php?id=<?php echo $row['id'];?>"><span class="btn btn-success"><i class="fa fa-edit"></i> Edit Prescription</span></a>
<a href="delete.php?id=<?php echo $row['id'];?>"><span class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</span></a></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
</div>
<?php include "../I/footer.php";?>
 <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<?php include"../Include/footer.php";?>