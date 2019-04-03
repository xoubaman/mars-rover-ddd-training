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

        public string PlateauId { get; }
        public string RoverId { get; }
        public int X { get; }
        public int Y { get; }
        public string Orientation { get; }
    }
}
