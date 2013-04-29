using System;
using System.Collections.Generic;
using System.Dynamic;
using System.Linq;
using System.Web;

namespace Custodes
{
    public class MergedType<T1, T2> : DynamicObject
    {
        T1 t1;
        T2 t2;
        Dictionary<string, object> members = new Dictionary<string, object>(StringComparer.InvariantCultureIgnoreCase);

        public MergedType(T1 t1, T2 t2)
        {
            this.t1 = t1;
            this.t2 = t2;
            foreach (System.Reflection.PropertyInfo fi in typeof(T1).GetProperties())
            {
                members[fi.Name] = fi.GetValue(t1, null);
            }
            foreach (System.Reflection.PropertyInfo fi in typeof(T2).GetProperties())
            {
                members[fi.Name] = fi.GetValue(t2, null);
            }
        }

        public override bool TryGetMember(GetMemberBinder binder, out object result)
        {
            string name = binder.Name.ToLower();
            return members.TryGetValue(name, out result);
        }
    }
}