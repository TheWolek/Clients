const cors = require('cors')
const mysql = require('mysql')

const express = require('express'),
    app = express(),
    port = process.env.PORT || 3000


app.listen(port)

const Q_selectAll = 'select * from clients'

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '132',
    database: 'clients'
})

connection.connect(err => {
    if(err)
        return err
})

app.use(cors())

app.get('/',(req,res) => {
    res.send('hello')
})

app.get('/clients',(req,res) => {
    connection.query(Q_selectAll, (err,results) => {
        if(err)
            return res.send(err)
        else
            return res.json({
                data: results
            })
    })
})