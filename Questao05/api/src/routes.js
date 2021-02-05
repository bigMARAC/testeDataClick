const express = require('express')
const SocioController = require('./controllers/SocioController')
const ClubeController = require('./controllers/ClubeController')

const routes = express.Router()

routes.post('/clubes', ClubeController.store) // criar um novo clube
routes.get('/clubes', ClubeController.index) // listar clubes
routes.delete('/clubes/:clube_id', ClubeController.drop) // deletar clube
routes.delete('/clubes/:clube_id/socios', SocioController.delete) // desassociar um sócio de um clube

routes.post('/socios/register', SocioController.store) // criar sócios
routes.delete('/socios/delete/:socio_id', SocioController.drop) // deletar sócio


routes.get('/socios/:socio_id/', SocioController.index) // listar clubes de um sócio
routes.get('/socios/', SocioController.index) // listar todos os sócios e seus clubes


module.exports = routes