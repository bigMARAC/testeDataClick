const Sequelize = require('sequelize')
const config = require('./../config/db')
const Socio = require('../models/Socio')
const Clube = require('../models/Clube')

const conn = new Sequelize(config)

Socio.init(conn)
Clube.init(conn)

Socio.associate(conn.models)
Clube.associate(conn.models)

module.exports = conn;
