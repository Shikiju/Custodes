namespace Custodes.Services
{
    using MySql.Data.MySqlClient;

    public interface IDatabaseService
    {
        MySqlConnection GetOpenConnection();
    }
}