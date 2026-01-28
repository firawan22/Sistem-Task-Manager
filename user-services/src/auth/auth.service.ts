import { Injectable } from '@nestjs/common';
import { RegisterDto } from './dto/register.dto';
import { AmqpConnection } from '@golevelup/nestjs-rabbitmq';

@Injectable()
export class AuthService {
  constructor(
    private readonly amqpConnection: AmqpConnection,
  ) {}

  register(dto: RegisterDto) {
    // publish event ke RabbitMQ
    this.amqpConnection.publish(
      'user-exchange',
      'user.created',
      {
        email: dto.email,
      },
    );

    return {
      message: 'User registered',
      email: dto.email,
    };
  }
}
