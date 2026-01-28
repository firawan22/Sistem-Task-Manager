import { Module } from '@nestjs/common';
import { RabbitMQModule } from '@golevelup/nestjs-rabbitmq';
import { AuthService } from './auth.service';
import { AuthController } from './auth.controller';

@Module({
  imports: [
    RabbitMQModule.forRoot({
      uri: 'amqp://guest:guest@localhost:5672',
      exchanges: [
        {
          name: 'user-exchange',
          type: 'direct',
        },
      ],
    }),
  ],
  controllers: [AuthController],
  providers: [AuthService],
})
export class AuthModule {}
