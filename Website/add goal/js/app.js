class Goal{
	constructor(i, n, ms, d, p, s, m){
		this.id = i,
		this.name = n, 
		this.moneySaved = ms,
		this.dateCreated = d,
		this.pledges = p,
		this.streak = s,
		this.milestone = m
	}
}

$("#addButton").click(function(){
	$goalName = $("#newGoal").val()
	goal = new Goal(0, $goalName, 0, new Date(), [], 0, 0)
	$("#items-wrapper").append("<p><a href='details.html?id="+goal.id+"'><span>"+goal.name+".</span> <span>Streak: "+goal.streak+"</span></a></p>")
	$("#newGoal").val("")
	console.log(goal)
})