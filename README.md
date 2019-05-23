# Mars rover DDD training

## Introduction

Programming exercise intended to show how to implement DDD tactical patterns
using an version of the Mars Rover Kata.

## Description

We have an hangar in our space station orbiting Mars(!?) with some rovers
available for exploring missions. 

A mission consists in a rover sent to a Mars plateaus to explore it and send
fancy pictures of red dust to Earth.

Plateaus are divided on squares, conforming a grid.

Each navigable position on the plateau has a X,Y pair of coordinates.

Rovers are deployed on a coordinate, facing one cardinal point (N, E, S, W), and
get a list of movements to do.

Rovers can move forward (M), turn 90º left (L) or turn 90º right (R).

An example of a 4x3 plateau.

```
0,3 __ __ __ __  4,3
   |__|__|__|__|
   |__|__|__|__|
   |__|__|__|__|
0,0             4,0
```

So, deploying a rover on coordinate 1,0 and sending movements MRM will leave the
rover at position 2,1 and facing east.

They cannot get out of the plateau. If the rover gets to the border of the
plateau and it is told to move forward, it will not move at all.

Every time a rover moves to a new point in the plateau, it takes a picture and
sends it to the main base.

## Training

The idea is to cover two cases: applying DDD tactical patterns on a greenfield
case and on an existing spaghetti-like implementation.

Two examples for both cases are provided. One to be used as an introduction on
how to apply the patterns by the training facilitator and other to be done by
participants.

Greenfield cases:

* Facilitator: `ReleaseMissionHandler`
* Participants: `DeployRoverHandler`

Already implemented cases:

* Facilitator: `TakePicture`
* Participants: `MoveRover`

The greenfield cases come with test skeletons pointing the behavior we want the
cases to have. Participants should change the test and add the implementation
applying DDD patterns.

The already implemented classes come with tests covering all their behaviour.
Participants should avoid as much as possible changing the tests, introducing 
iteratively the DDD patterns mixed with existing code. At certain point it will
be good to change the storage method to apply the repository pattern and 
changing the tests will be justified.  

Ideally, the domain model from the greenfield cases could be used for the
refactors on the implemented cases.
