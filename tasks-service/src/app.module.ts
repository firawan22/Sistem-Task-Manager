import { Module } from '@nestjs/common';
import { RabbitMQModule } from '@golevelup/nestjs-rabbitmq';
import { AppController } from './app.controller';
import { AppService } from './app.service';

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
      queues: [
        {
          name: 'task-service-user-created',
          exchange: 'user-exchange',
          routingKey: 'user.created',
        },
      ],
    }),
  ],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
