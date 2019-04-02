Rovers are deployed on Mars plateaus to explore them  and send fancy pictures
of red dust to Earth.

Plateus are divided on squares, conforming a grid.

Each navigable position on the plateau has a X, Y pair of coordinates.
 N
W E
 S
0,3 __ __ __ __  4,3
   |__|__|__|__|
   |__|__|__|__|
   |__|__|__|__|
0,0             4,0

Rovers are deployed on a coordinate, facing north, and get a list of movements to do.

They can move forward (M), turn 90º left (L) or turn 90º right (R).

So, deployed on coordinate 1,0 with movements MRM will leave the rover at 
position 2,1 and facing east

They cannot get out of the plateau. If the rover gets to the limit of the plateau
and it is told to move forward, it will not move at all.

