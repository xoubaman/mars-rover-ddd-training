using MarsRoverKata.Application.Command;
using MarsRoverKata.Application.Infrastructure;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using System;

namespace MarsRoverTests
{
    [TestClass]
    public class MoveRoverTests
    {
        const string ROVER_ID = "rover-id";
        const string PLATEAU_ID = "plateau-num5";

        GenericStorage _storage;

        MoveRover _service;

        [TestInitialize]
        public void testInitialize()
        {
            _storage = new GenericStorage();

            _service = new MoveRover(_storage);
        }

        
        [TestMethod]
        public void testRoverMoves()
        {
            _storage.Store(PLATEAU_ID, new Plateau { Dimensions = "4,3" });
            _storage.Store(ROVER_ID, new Rover{ Position = "1,1,N", PlateauId = PLATEAU_ID });

            _service.Move(ROVER_ID, "MRM");

            assertRoverIsInPosition("2,1,E");
        }

        [TestMethod]
        [ExpectedException(typeof(Exception))]
        public void testPlateauMustExist()
        {
            _storage.Store(ROVER_ID, new Rover { Position = "1,1,N", PlateauId = PLATEAU_ID });

            _service.Move(ROVER_ID, "M");
        }

        [TestMethod]
        [ExpectedException(typeof(Exception))]
        public void testRoverMustExist()
        {
            _storage.Store(PLATEAU_ID, new Plateau { Dimensions = "4,3" });

            _service.Move("not stored rover", "M");
        }

        private void assertRoverIsInPosition(string position)
        {
            var storedRover = (Rover)_storage.Read(ROVER_ID);
            Assert.AreEqual(position, storedRover.Position);
        }
    }
}
