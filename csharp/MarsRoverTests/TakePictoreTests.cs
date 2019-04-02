using MarsRoverKata;
using Microsoft.VisualStudio.TestTools.UnitTesting;
using System.Collections.Generic;
using System.Linq;

namespace MarsRoverTests
{
    [TestClass]
    public class TakePictoreTests
    {
        const string ROVER_ID = "rover-id";
        const string POSITION = "1,1,N";

        GoProDuskWhite _goPro;
        PicturesStorage _storage;

        TakePicture _service;

        [TestInitialize]
        public void testInitialize()
        {
            _goPro = new GoProDuskWhite();
            _storage = new PicturesStorage();

            _service = new TakePicture(_goPro, _storage);
        }

        [TestMethod]
        public void testRoverStoresTakenPictures()
        {
            _storage.Store(ROVER_ID, new StorageItem { Position = POSITION, Pictures = new Dictionary<string, string>() });
            _service.TakePhoto(ROVER_ID);
            assertRoverTookThePhotoForPosition(POSITION);
        }

        [TestMethod]
        [ExpectedException(typeof(PhotoStorageFullException))]
        public void testCannotTakeMoreThanThreePhotosOfDifferentCoordinates()
        {
            _storage.Store(ROVER_ID, new StorageItem { Position = POSITION, Pictures = new Dictionary<string, string> {
                { "0,0,N", "some trollface meme" },
                { "1,0,N", "some cat gif" },
                { "2,0,N", "some goat gif" }
            } });

            _service.TakePhoto(ROVER_ID);
        }

        private void assertRoverTookThePhotoForPosition(string position)
        {
            var roverData = _storage.Read(ROVER_ID);
            var pictures = roverData.Pictures;

            var picturesInPosition = pictures.Where(p => p.Key == position);
            Assert.IsTrue(picturesInPosition.Count() > 0);
        }
}
}
