<?php

$square_size = '30px';

if ( ! isset( $argv[1] ) ) {
	echo "Missing file name parameter.";
}

$file = file( $argv[1] );

$array = array();
$max_row_length = 0;

foreach ( $file as $row ) {
	$exploded = explode( "\t", $row );
	if ( count( $exploded ) > $max_row_length ) {
		$max_row_length = count( $exploded );
	}
	$array[] = $exploded;
}

?>
<html>
	<head>
		<title>Cypher puzzle solver</title>
	</head>
	<body>
		<table id="grid">
<?php

foreach ( $array as $row ) {
	?>
			<tr>
	<?php
	$row_count = 0;
	foreach ( $row as $box ) {
		$box = trim( $box );
		?>
				<td>
		<?php
		if ( $box !== '-' ) {
			?>
					<input type="text" size="1" class='box-<?php echo $box; ?>' placeholder='<?php echo $box; ?>' />
			<?php 
		} else {
			?>
					<span class="empty"></span>
			<?php
		}
		?>
				</td>
		<?php
		$row_count++;
	}
	for ( $i = $row_count; $i < $max_row_length; $i++ ) {
		?>
				<td>
					<span class="empty"></span>
				</td>
		<?php
	}
	?>
			</tr>
	<?php
}

?>
		</table>

		<hr />

		<table id="solutions">
			<tr>
				<td><input type="text" size="1" class="solution-1" placeholder='1' /></td>
				<td><input type="text" size="1" class="solution-2" placeholder='2' /></td>
				<td><input type="text" size="1" class="solution-3" placeholder='3' /></td>
				<td><input type="text" size="1" class="solution-4" placeholder='4' /></td>
				<td><input type="text" size="1" class="solution-5" placeholder='5' /></td>
			</tr>
			<tr>
				<td><input type="text" size="1" class="solution-6" placeholder='6' /></td>
				<td><input type="text" size="1" class="solution-7" placeholder='7' /></td>
				<td><input type="text" size="1" class="solution-8" placeholder='8' /></td>
				<td><input type="text" size="1" class="solution-9" placeholder='9' /></td>
				<td><input type="text" size="1" class="solution-10" placeholder='10' /></td>
			</tr>
			<tr>
				<td><input type="text" size="1" class="solution-11" placeholder='11' /></td>
				<td><input type="text" size="1" class="solution-12" placeholder='12' /></td>
				<td><input type="text" size="1" class="solution-13" placeholder='13' /></td>
				<td><input type="text" size="1" class="solution-14" placeholder='14' /></td>
				<td><input type="text" size="1" class="solution-15" placeholder='15' /></td>
			</tr>
			<tr>
				<td><input type="text" size="1" class="solution-16" placeholder='16' /></td>
				<td><input type="text" size="1" class="solution-17" placeholder='17' /></td>
				<td><input type="text" size="1" class="solution-18" placeholder='18' /></td>
				<td><input type="text" size="1" class="solution-19" placeholder='19' /></td>
				<td><input type="text" size="1" class="solution-20" placeholder='20' /></td>
			</tr>
			<tr>
				<td><input type="text" size="1" class="solution-21" placeholder='21' /></td>
				<td><input type="text" size="1" class="solution-22" placeholder='22' /></td>
				<td><input type="text" size="1" class="solution-23" placeholder='23' /></td>
				<td><input type="text" size="1" class="solution-24" placeholder='24' /></td>
				<td><input type="text" size="1" class="solution-25" placeholder='25' /></td>
			</tr>
		</table>

		<style>
		table {
			border-collapse: collapse;
		}

		input {
			width: <?php echo $square_size ?>;
			height: <?php echo $square_size ?>;
		}

		span.empty {
			width: <?php echo $square_size ?>;
			height: <?php echo $square_size ?>;
			display: block;
			background-color: #121212;
		}
		</style>

		<script>
		const solutionInputs = document.querySelectorAll("table#solutions input")
		solutionInputs.forEach(input => {
			input.addEventListener("change", solutionChange)
		})

		function solutionChange(event) {
			const re = /solution-(\d+)/
			const boxNumber = event.target.className.replace(re, "box-$1")
			event.target.value = event.target.value.toUpperCase()
			changeGridInputs(boxNumber, event.target.value)

			const solutionInputs = document.querySelectorAll("table#solutions input")
			solutionInputs.forEach(input => {
				if (input.value == event.target.value && input.className != event.target.className) {
					const changedBoxNumber = input.className.replace(re, "box-$1")
					changeGridInputs(changedBoxNumber, '')
					input.value = ''
				}
			})
		}

		function changeGridInputs(boxNumber, newValue) {
			const gridInputs = document.querySelectorAll("table#grid input")
			gridInputs.forEach(input => {
				if (input.className == boxNumber) {
					input.value = newValue
				}
			})
		}

		</script>
	</body>
</html>
<?php