<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form>
		<table border="1" cellspacing="0">
			<tr>
				<th>NO</th>
				<th>Nama</th>
				<th>Kelas</th>
			</tr>

		<?php  for ($no = 1, $i=1, $a=10; $i<=10, $a>0  ; $i++, $a--) { ?>

			<tr>
				<td> <?php echo $no; ?></td>
				<td><?php echo "Nama Ke $i"; ?></td>
				<td><?php echo "Kelas $a"; ?></td>
			</tr>

		<?php $no++; } ?>

		</table>
	</form>
</body>
</html>