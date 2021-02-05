const { Model, DataTypes } = require('sequelize')

class Clube extends Model {
    static init(sequelize) {
        super.init({
            name: DataTypes.STRING
        }, {
            sequelize
        })
    }

    static associate(models) {
        this.belongsToMany(models.Socio, { foreignKey: 'clube_id', through: 'socio_clubes', as: 'socios' })
    }
}

module.exports = Clube