using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using AddictionManager.Models;
namespace AddictionManager.Services
{
    public interface IDataStore
    {
        Task<String> AddGoalAsync(Goal addictionGoal);
        Task<bool> UpdateGoalAsync(Goal addictionGoal);
        Task<Goal> GetGoalAsync(String id);
        Task<IList<Goal>> GetGoalAsync();
    }
}
