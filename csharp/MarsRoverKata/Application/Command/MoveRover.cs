using MarsRoverKata.Application.Infrastructure;
using System;
using System.Linq;

namespace MarsRoverKata.Application.Command
{
    public class MoveRover
    {
        private GenericStorage _storage;
        private string maxX;
        private string maxY;

        public MoveRover(GenericStorage storage)
        {
            _storage = storage;
        }

        public void Move(string roverId, string movements)
        {
            object roverObj = _storage.Read(roverId);
            
            if (roverObj != null)
            {
                var roverData = (Rover)roverObj;
                var plateauObj = _storage.Read(roverData.PlateauId);

                if (plateauObj != null)
                {
                    var plateau = (Plateau)plateauObj;

                    var position = roverData.Position;
                    var positionArray = position.Split(',');
                    var initialX = int.Parse(positionArray[0]);
                    var initialY = int.Parse(positionArray[1]);
                    var initialOrientation = positionArray[2];

                    var movementsArray = movements.ToArray();

                    var currentX = initialX;
                    var currentY = initialY;
                    var currentOrientation = initialOrientation;
                    var plateauDimensions = plateau.Dimensions;
                    var plateauDimensionsArray = plateau.Dimensions.Split(',');
                    maxX = plateauDimensionsArray[0];
                    maxY = plateauDimensionsArray[1];

                    foreach (var movement in movementsArray) {
                        switch (movement) {
                            case 'R':
                                if (currentOrientation == "N") {
                                    currentOrientation = "E";
                                }
                                break;
                            case 'M':
                                if (currentOrientation == "E") {
                                    currentX++;
                                }
                                break;
                        }

                        roverData.Position = string.Join(',', new string[] { currentX.ToString(), currentY.ToString(), currentOrientation });
                    }
                }
                else
                {
                    throw new Exception("Plateau not found");
                }
            }
            else
            {
                throw new Exception("Rover not found");
            }
        }
    }

    public class Plateau
    {
        public string Dimensions { get; set; }
    }

    public class Rover
    {
        public string Position { get; set; }
        public string PlateauId { get; set; }
    }
}
