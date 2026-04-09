<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
class StudentsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('students');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');
        $this->belongsTo('SchoolClasses', [
            'foreignKey' => 'school_class_id'
        ]);

        $this->addBehavior('Timestamp');
        
        $this->addBehavior('CounterCache', [
            'SchoolClasses' => ['student_count']
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->integer('age')
            ->requirePresence('age', 'create')
            ->notEmptyString('age');

        $validator
            ->integer('school_class_id')
            ->requirePresence('school_class_id', 'create')
            ->notEmptyString('school_class_id');

        $validator
            ->scalar('address') 
            ->maxLength('address', 500)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->integer('phone_number')
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        return $validator;
    }
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['school_class_id'], 'SchoolClasses'), ['errorField' => 'school_class_id']);

        return $rules;
    }
}
