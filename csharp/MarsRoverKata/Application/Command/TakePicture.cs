using System;
using System.Collections.Generic;

namespace MarsRoverKata
{
    public class TakePicture
    {
        private GoProDuskWhite _goPro;
        private GenericStorage _storage;

        public TakePicture(GoProDuskWhite goPro, GenericStorage storage)
        {
            _goPro = goPro;
            _storage = storage;
        }

        public void TakePhoto(string roverId)
        {
            var bitmap = _goPro.TakePhotos("default obturation", "0X", 1);
            var rover = (PictureData)_storage.Read(roverId);
            var position = rover.Position;
            rover.Pictures.Add(position, bitmap);

            if (rover.Pictures.Count > 3) {
                throw new PhotoStorageFullException();
            }
        }
    }

    public class GoProDuskWhite
    { 
        public string TakePhotos(string obturation, string zoom, int numberOfPhotos)
        {
            var random = new Random();

            return random.Next(1000, 9999).ToString();
        }
    }

    public class PictureData
    {
        public string Position { get; set; }
        public Dictionary<string, string> Pictures { get; set; }
    }
    
    public class PhotoStorageFullException : Exception
    {

    }
}
