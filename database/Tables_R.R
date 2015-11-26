#SET WORKING DIRECTORY
setwd("/Users/CMV/Desktop/FS2015/CS3380/FinalProject/Tables")

#IMPORT CSV TABLES
DetailedTransactions <- read.csv('Detailed Transactions.csv',header=TRUE,sep=",")
ExportTransactionTenders <- read.csv('Export Transaction Tenders.csv', header=TRUE,sep=",")
ExportTransactions <- read.csv('Export Transactions.csv',header=TRUE,sep=",")
SalesReport <- read.csv('Sales Report.csv',header=TRUE,sep=",")
SoldItems <- read.csv('Sold Items.csv',header=TRUE,sep=",")

#PRINT TABLES
DetailedTransactions
ExportTransactionTenders
ExportTransactions
SalesReport
SoldItems