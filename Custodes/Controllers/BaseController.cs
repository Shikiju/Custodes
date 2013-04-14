namespace Custodes.Controllers
{
    using Custodes.Models;
    using System;
    using System.Net;
    using System.Net.Http;
    using System.Web.Http;

    public class BaseController : ApiController
    {
        public User User { get; set; }

        public BaseController() 
            : base()
        { 
        }
    }
}
