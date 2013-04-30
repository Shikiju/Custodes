namespace Custodes.WebApi.Controllers
{
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Web;
    using System.Web.Http;

    using Dapper;
    using Custodes.Services;
    using Custodes.WebApi.Models;
    using Custodes.Filters;
    using Custodes.Controllers;
    using Custodes.Utils;

    [AuthenticationFilter]
    public class CredentialController : BaseController
    {
        private IDatabaseService databaseService;

        public CredentialController(IDatabaseService databaseService)
        {
            this.databaseService = databaseService;
        }

        [HttpGet]
        public IEnumerable<Credential> Index()
        {
            var credentials = Enumerable.Empty<Credential>();
            using (var connection = this.databaseService.GetOpenConnection())
            {
                credentials = connection.Query<Credential>("SELECT * FROM credentials WHERE userid = @userid", new { userid = this.User.Id });
            }

            return credentials;
        }

        [HttpGet]
        public Credential Index(int id)
        {
            var credential = new Credential();
            using (var connection = this.databaseService.GetOpenConnection())
            {
                credential = connection.Query<Credential>("SELECT * FROM credentials WHERE id = @id AND userid = @userid", new { id = id, userid = this.User.Id }).FirstOrDefault();
            }

            return credential;
        }

        [HttpPut]
        public Credential Put(Credential credential)
        {
            using (var connection = this.databaseService.GetOpenConnection())
            {
                connection.Execute(@"UPDATE credentials
                    SET    Name = @Name, 
                           Login = @Login, 
                           Password = @Password, 
                           GroupName = @GroupName, 
                           IsFavorite = @IsFavorite 
                    WHERE  Id = @Id 
                           AND userid = @UserId", credential);
            }

            return credential;
        }

        [HttpPost]
        public Credential Post(Credential credential)
        {
            var user = this.User;
            credential.UserId = this.User.Id;

            using (var connection = this.databaseService.GetOpenConnection())
            {
                connection.Execute("INSERT INTO credentials (Name, Login, Password, GroupName, IsFavorite, UserId) VALUES (@Name, @Login,@Password, @GroupName, @IsFavorite, @UserId)", credential);
            }

            return credential;
        }

        [HttpDelete]
        public void Delete(int id)
        {
            using (var connection = this.databaseService.GetOpenConnection())
            {
                connection.Execute("DELETE FROM credentials WHERE id = @id AND userid = @userid", new { id = id, userid = this.User.Id });
            }
        }

        [HttpOptions]
        public void Options(Credential credential)
        {
            return;
        }
    }
}
