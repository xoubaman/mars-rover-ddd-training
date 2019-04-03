using System;

namespace MarsRoverKata.Application.Command
{
    public class ReleaseMission
    {
        private string _plateauId;
        private string _roverId;

        public ReleaseMission(string plateauId, string roverId)
        {
            _plateauId = plateauId;
            _roverId = roverId;
        }

    }
}
