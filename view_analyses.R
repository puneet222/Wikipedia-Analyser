library(RMySQL)
library(ggplot2)

get_date <- function(year , month , date){
  mylist <- list() ;
  mylist$'01' <- "January" ;
  mylist$'02' <- "February" ;
  mylist$'03' <- "March" ;
  mylist$'04' <- "April" ;
  mylist$'05' <- "May" ;
  mylist$'06' <- "June" ;
  mylist$'07' <- "July" ;
  mylist$'08' <- "August" ;
  mylist$'09' <- "September" ;
  mylist$'10' <- "October" ;
  mylist$'11' <- "November" ;
  mylist$'12' <- "December" ;
  
  refdate <- paste0(date ,"-" ,  mylist[[month]] ,"-" , year ) ;
  refdate ;
  
}

get_month <- function(month){
  mylist2 <- list() ;
  mylist2$'01' <- "January" ;
  mylist2$'02' <- "February" ;
  mylist2$'03' <- "March" ;
  mylist2$'04' <- "April" ;
  mylist2$'05' <- "May" ;
  mylist2$'06' <- "June" ;
  mylist2$'07' <- "July" ;
  mylist2$'08' <- "August" ;
  mylist2$'09' <- "September" ;
  mylist2$'10' <- "October" ;
  mylist2$'11' <- "November" ;
  mylist2$'12' <- "December" ;
  
  month <- mylist2[[month]] ;
  month
}

conn <- dbConnect(MySQL(), host="127.0.0.1", port= 3306, user="root",
                  password = "", dbname="wiki")

year <- dbGetQuery(conn , "Select distinct(year) from user_views") ;

year <- year[,"year"]

t.year <- length(year) ;

month <- c() ;

for(i in 1 : t.year)
{
  #monthly analysis
  query <- paste0("select distinct(month) from user_views where year=" , "'" , year[i] , "'")
  smonth <- dbGetQuery(conn , query) 
  month <- c(month , smonth) 
  
  #now month is a list so we have to convert into any other data structure for ease of accessibilty
  month <- rapply(month, c)
  t.month <- length(month)
  date <- c() ;
  for(j in 1 : t.month)
  {
    query <- paste0("Select distinct(date) from user_views where year=" , "'" , year[i] , "'" , "AND month=" , "'" , month[[j]] , "'")
    temp <- dbGetQuery(conn , query) ;
    #now we have all the dates of that month
    date <- temp[,"date"] #converting data frame into character vector
    t.date <- length(date) ;
    
    views <- c() ;
    for(k in 1 : t.date)
    {
      query <- paste0("Select views from user_views where year=" , "'" , year[i] , "'" , " and month=" , "'" , month[[j]] , "'" , " and date="  , "'" , date[k] , "'")
      temp2 <- dbGetQuery(conn , query) ;
      views <- c(views , temp2[,"views"])
    }
    
    
    
    #now we have date vector having all the dates of month[[j]] and year[i]
    #and we also have vector of views of the corrresponding date
    
    #now we create graph plot
    
    #now i am making the main label
    main_l = paste0(get_month(month[[j]]) , " " , year[i]) ;
    
    #now making the name of the plot
    name = paste0(year[i] , get_month(month[[j]]) , ".png")
    png(file=name , height = 500 , width = 1200)
    plot(views , type = "o" , col="blue" , lwd = 3 , main = main_l , sub="Monthly Analysis of user views " , ylab = "User views" , xlab = "Date" )
    axis(1 , at=date, labels = date)
    dev.off()
    
    date <- c() ;
  }
  month <-c() ;
}

#overall analyses

total_views <- dbGetQuery(conn , "Select views from user_views") ;
total_views <- total_views[,"views"]
total_year <- dbGetQuery(conn , "Select year from user_views") ;
total_year <- total_year[,"year"]
total_month <- dbGetQuery(conn , "Select month from user_views") ;
total_month <- total_month[,"month"]
total_date <- dbGetQuery(conn , "Select date from user_views") ;
total_date <- total_date[,"date"]

olen <- length(total_views) ;

odate <- c() ;

for(i in 1:olen)
{
  temp2 <- paste0(total_date[i] , "-" , get_month(total_month[i]) , "-" , total_year[i]);
  odate <- c(odate , temp2);
}
start <- get_date(total_year[1] , total_month[1] , total_date[1])
end <- get_date(total_year[olen] , total_month[olen] , total_date[olen])

omain <- paste0("Analysis of User views from " , start , " - " , end)
png(file = "overall.png" , height = 500 , width = 1250)
plot(total_views , type = "l" , col="blue" , lwd = 1 , main = omain , sub="OverAll Analysis of user views" , ylab = "User views" , xlab = "Timeline" , xaxt = 'n' )
axis(1 , at=1:olen , labels = odate)
dev.off()

#last 30 days
query30v <- "Select views from user_views order by year desc , month desc , date desc limit 30"
last30v <- dbGetQuery(conn , query30v) ;
last30v <- last30v[,"views"]

query30y <- "Select year from user_views order by year desc , month desc , date desc limit 30"
last30y <- dbGetQuery(conn , query30y) ;
last30y <- last30y[,"year"]

query30m <- "Select month from user_views order by year desc , month desc , date desc limit 30"
last30m <- dbGetQuery(conn , query30m) ;
last30m <- last30m[,"month"]

query30d <- "Select date from user_views order by year desc , month desc , date desc limit 30"
last30d <- dbGetQuery(conn , query30d) ;
last30d <- last30d[,"date"]

last30dates <- c() ;
views30  <- c() ;
for(i in 0:29)
{
  tempdates <- get_date(last30y[30-i] , last30m[30-i] , last30d[30-i])
  last30dates <- c(last30dates , tempdates)
  tempviews <- last30v[30-i] ;
  views30 <- c(views30 , tempviews)
}

#now we have last  30 days views and dates
png(file="last30.png" , height = 800 , width=1200)
plot(views30 , type = "o" , col="blue" , lwd = 1 , main = "Last 30 days Analysis" , ylab = "User views" , xlab = "Timeline" , xaxt='n' )
axis(1 , at=1:30 , labels = last30dates)
par(las=2)
dev.off()

# last 60 days analysis

query60v <- "Select views from user_views order by year desc , month desc , date desc limit 60"
last60v <- dbGetQuery(conn , query60v) ;
last60v <- last60v[,"views"]

query60y <- "Select year from user_views order by year desc , month desc , date desc limit 60"
last60y <- dbGetQuery(conn , query60y) ;
last60y <- last60y[,"year"]

query60m <- "Select month from user_views order by year desc , month desc , date desc limit 60"
last60m <- dbGetQuery(conn , query60m) ;
last60m <- last60m[,"month"]

query60d <- "Select date from user_views order by year desc , month desc , date desc limit 60"
last60d <- dbGetQuery(conn , query60d) ;
last60d <- last60d[,"date"]

last60dates <- c() ;
views60  <- c() ;
for(i in 0:59)
{
  tempdates <- get_date(last60y[60-i] , last60m[60-i] , last60d[60-i])
  last60dates <- c(last60dates , tempdates)
  tempviews <- last60v[60-i] ;
  views60 <- c(views60 , tempviews)
}

#now we have last  60 days views and dates
png(file="last60.png" , height = 800 , width=1200)
plot(views60 , type = "o" , col="blue" , lwd = 1 , main = "Last 60 days Analysis" , ylab = "User views" , xlab = "Timeline" , xaxt='n' )
axis(1 , at=1:60 , labels = last60dates)
par(las=2)
dev.off()

#last 90 days Analysis

query90v <- "Select views from user_views order by year desc , month desc , date desc limit 90"
last90v <- dbGetQuery(conn , query90v) ;
last90v <- last90v[,"views"]

query90y <- "Select year from user_views order by year desc , month desc , date desc limit 90"
last90y <- dbGetQuery(conn , query90y) ;
last90y <- last90y[,"year"]

query90m <- "Select month from user_views order by year desc , month desc , date desc limit 90"
last90m <- dbGetQuery(conn , query90m) ;
last90m <- last90m[,"month"]

query90d <- "Select date from user_views order by year desc , month desc , date desc limit 90"
last90d <- dbGetQuery(conn , query90d) ;
last90d <- last90d[,"date"]

last90dates <- c() ;
views90  <- c() ;
for(i in 0:89)
{
  tempdates <- get_date(last90y[90-i] , last90m[90-i] , last90d[90-i])
  last90dates <- c(last90dates , tempdates)
  tempviews <- last90v[90-i] ;
  views90 <- c(views90 , tempviews)
}

#now we have last  90 days views and dates
png(file="last90.png" , height = 800 , width=1200)
plot(views90 , type = "o" , col="blue" , lwd = 1 , main = "Last 90 days Analysis" , ylab = "User views" , xlab = "Timeline" , xaxt='n' )
axis(1 , at=1:90 , labels = last90dates)
par(las=2)
dev.off()

