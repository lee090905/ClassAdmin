<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SchoolClasses Model
 *
 * @method \App\Model\Entity\SchoolClass newEmptyEntity()
 * @method \App\Model\Entity\SchoolClass newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\SchoolClass> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SchoolClass get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\SchoolClass findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\SchoolClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\SchoolClass> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SchoolClass|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\SchoolClass saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\SchoolClass>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SchoolClass>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SchoolClass>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SchoolClass> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SchoolClass>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SchoolClass>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\SchoolClass>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\SchoolClass> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchoolClassesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('school_classes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('teacher')
            ->requirePresence('teacher', 'create')
            ->notEmptyString('teacher');

        $validator
            ->integer('quantity_student')
            ->requirePresence('quantity_student', 'create')
            ->notEmptyString('quantity_student');

        return $validator;
    }
}
