using System;

namespace MarsRoverKata.Application.Command
{
    public class DeployRover
    {
        private string _plateauId;
        private string _roverId;
        private int _x;
        private int _y;
        private string _orientation;

        public DeployRover(string plateauId, string roverId, int x, int y, string orientation)
        {
            _plateauId = plateauId;
            _roverId = roverId;
            _x = x;
            _y = y;
            _orientation = orientation;
        }
    }
}
