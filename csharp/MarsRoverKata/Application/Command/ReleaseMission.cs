using System;

namespace MarsRoverKata.Application.Command
{
    public class ReleaseMission
    {
        public ReleaseMission(string plateauId, string roverId)
        {
            PlateauId = plateauId;
            RoverId = roverId;
        }

        public string PlateauId { get; }
        public string RoverId { get; }
    }
}
