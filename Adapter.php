<!DOCTYPE HTML>
<html>
<head>

<style text="css">
	div {color:green;
		font-size:30px;}
	.human {color:red;
			font-size:30px;}
	.robot {color:blue;
			font-size:30px;}

</style>

</head>
<body>

	<div>
	<?php
		
		interface Student{
		
			function drink();
			function speak();
			function think();
		
		}
		
		interface Robot{
		
			function insertLiquid();
			function makeNoise();
			function compute();
		
		}
		
		//This is the adapter class which converts the interface Student to the interface Robot
		class RobotAdapter implements Student{
		
			public $robot;
			
			function __construct($robot){
				$this->robot = $robot;
			}
			
			function drink(){
				$this->robot->insertLiquid();
			}
			function speak(){
				$this->robot->makeNoise();
			}
			function think(){
				$this->robot->compute();
			}
		
		}
		
		//Some concrete student
		class FMIStudent implements Student{
		
			function drink(){
				echo "<div class=\"human\">I like beer!!!</div>";
			}
			function speak(){
				echo "<div class=\"human\">What's up!?!</div>";
			}
			function think(){
				echo "<div class=\"human\">thinking, thinking ...</div>";
			}
		
		}
		
		//Some concrete robot
		class Bender implements Robot{
		
			function insertLiquid(){
				echo "<div class=\"robot\">I need booze to recharge my batteries!!!</div>";
			}
			function makeNoise(){
				echo "<div class=\"robot\">Bite my shiny metal ...</div>";
			}
			function compute(){
				echo "<div class=\"robot\">I am programmed to simulate the pathetic human brain!!!</div>";
			}
		
		}
		
		//Now lets TEST
		$s = new FMIStudent();
		$b = new Bender();
		
		$robotadapter = new RobotAdapter($b);	//We wrap the Robot with the RobotAdapter 
		
		echo "The FMI student:<br>";
			echo "Drinks: "; $s->drink();
			echo "Speaks: "; $s->speak();
			echo "Thinks: "; $s->think();
		
		echo "<br>The robot, which wants to be a student:<br>";
			echo "Drinks: "; $robotadapter->drink();
			echo "Speaks: "; $robotadapter->speak();
			echo "Thinks: "; $robotadapter->think();
	
	?>
	</div>
	
</body>
</html>