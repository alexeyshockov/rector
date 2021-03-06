<?php

declare(strict_types=1);

namespace Rector\Core\PHPStan\Reflection\TypeToCallReflectionResolver;

use PHPStan\Reflection\ClassMemberAccessAnswerer;
use PHPStan\Reflection\Native\NativeFunctionReflection;
use PHPStan\TrinaryLogic;
use PHPStan\Type\ClosureType;
use PHPStan\Type\Type;

final class ClosureTypeToCallReflectionResolver implements TypeToCallReflectionResolverInterface
{
    public function supports(Type $type): bool
    {
        return $type instanceof ClosureType;
    }

    /**
     * @param ClosureType $type
     */
    public function resolve(Type $type, ClassMemberAccessAnswerer $classMemberAccessAnswerer)
    {
        return new NativeFunctionReflection(
            '{closure}',
            $type->getCallableParametersAcceptors($classMemberAccessAnswerer),
            null,
            TrinaryLogic::createMaybe()
        );
    }
}
