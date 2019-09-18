using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using AddictionManager.Models;

namespace AddictionManager.Services
{
    public class MockDataStore : IDataStore
    {
       // private static readonly List<String> mockCourses;
        private static readonly List<Goal> mockGoals;
        private static int nextNoteId;

        static MockDataStore()
        {
            /*mockCourses = new List<string>
            {
                "Introduction to Xamarin.Forms",
                "Android Apps with Kotlin: First App",
                "Managing Android App Data with SQLite"
            };*/

            mockGoals = new List<Goal>
            {
                new Goal{Id="0",Name="Alcohol",Streak=5},
                new Goal{Id="1",Name="Smoking",Streak=2},
                new Goal{Id="2",Name="Vending machine food",Streak=12}
            };

            nextNoteId = mockGoals.Count;


        }

        public MockDataStore(){}

        public async Task<String> AddGoalAsync(Goal addictionGoal)
        {
            lock (this)
            {
                addictionGoal.Id = nextNoteId.ToString();
                mockGoals.Add(addictionGoal);
                nextNoteId++;
            }
            return await Task.FromResult(addictionGoal.Id);
        }

        public async Task<bool> UpdateGoalAsync(Goal addictionGoal)
        {
            var noteIndex = mockGoals.FindIndex((Goal arg) => arg.Id == addictionGoal.Id);
            var noteFound = noteIndex != -1;
            if (noteFound)
            {
                mockGoals[noteIndex].Name = addictionGoal.Name;
                mockGoals[noteIndex].Streak = addictionGoal.Streak;
            }
            return await Task.FromResult(noteFound);
        }

        public async Task<Goal> GetGoalAsync(string id)
        {
            var goal = mockGoals.FirstOrDefault(addictionGoal => addictionGoal.Id == id);
            var returnValue = CopyGoal(goal);
            return await Task.FromResult(returnValue);
        }

        public async Task<IList<Goal>> GetGoalAsync()
        {
            // Make a copy of the notes to simulate reading from an external datastore
            var returnValues = new List<Goal>();
            foreach (var goal in mockGoals)
                returnValues.Add(CopyGoal(goal));
            return await Task.FromResult(returnValues);
        }

        /*public async Task<IList<String>> GetCoursesAsync()
        {
            return await Task.FromResult(mockCourses);
        }*/

        private static Goal CopyGoal(Goal goal)
        {
            return new Goal { Id = goal.Id, Name = goal.Name, Streak = goal.Streak };
        }
    }

}
