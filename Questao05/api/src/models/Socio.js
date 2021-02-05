const { Model, DataTypes } = require('sequelize')

class Socio extends Model {
    static init(sequelize) {
        super.init({
            name: DataTypes.STRING
        }, {
            sequelize
        })
    }

    static associate(models) {
        this.belongsToMany(models.Clube, { foreignKey: 'socio_id', through: 'socio_clubes', as: 'clubes' })
    }
}

module.exports = Socio