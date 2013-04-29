using System;
using System.Collections.Generic;
using System.Dynamic;
using System.Linq;
using System.Web;

namespace Custodes.Utils
{
    public static class MainUtilities
    {
        public static MergedType<T1, T2> Merge<T1, T2>(T1 t1, T2 t2)
        {
            return new MergedType<T1, T2>(t1, t2);
        }
    }
}