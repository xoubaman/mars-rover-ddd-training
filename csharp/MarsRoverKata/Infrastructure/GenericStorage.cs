using System.Collections.Generic;
using System.Linq;

namespace MarsRoverKata.Application.Infrastructure
{
    public class GenericStorage
    {
        private Dictionary<string, object> StorageDict;
        public GenericStorage()
        {
            StorageDict = new Dictionary<string, object>();
        }

        public void Store(string id, object storageItem)
        {
            StorageDict.Add(id, storageItem);
        }

        public object Read(string id)
        {
            return StorageDict.Where(x => x.Key == id).Select(x => x.Value).FirstOrDefault();
        }
    }
}
