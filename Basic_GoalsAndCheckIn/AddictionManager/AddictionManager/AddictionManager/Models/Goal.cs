using System;
using System.Collections.Generic;

namespace AddictionManager.Models
{
    public class Goal
    {
        public String Id { get; set; }
        public String Name { get; set; }
       // public String MoneySaved { get; set; }
        //public String TimeSaved { get; set; }
        //public ICollection<String> Pledges { get; set; }
        public int Streak { get; set; }
        //public Milestone Milestone { get; set; }
    }
}
