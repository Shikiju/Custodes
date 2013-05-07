namespace Custodes.Models
{
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Web;

    public class User
    {
        public int Id { get; set; }
        public string HashedEmail { get; set; }
        public string HashedPassword { get; set; }
    }
}