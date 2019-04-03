using System;

namespace MarsRoverKata.Application.Command
{
    public class DeployRover
    {
        public DeployRover(string plateauId, string roverId, int x, int y, string orientation)
        {
            PlateauId = plateauId;
            RoverId = roverId;
            X = x;
            Y = y;
            Orientation = orientation;
        }

        public string PlateauId;
        public string RoverId;
        public int X;
        public int Y;
        public string Orientation;
    }
}
